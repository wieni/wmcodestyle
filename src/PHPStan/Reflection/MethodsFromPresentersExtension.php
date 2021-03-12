<?php

namespace Wieni\wmcodestyle\PHPStan\Reflection;

use PHPStan\Analyser\OutOfClassScope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;
use PHPStan\Type\FileTypeMapper;

class MethodsFromPresentersExtension implements MethodsClassReflectionExtension
{
    /** @var FileTypeMapper */
    private $fileTypeMapper;

    public function __construct(
        FileTypeMapper $fileTypeMapper
    ) {
        $this->fileTypeMapper = $fileTypeMapper;
    }

    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        if (!$modelClassReflection = $this->getPresenterModel($classReflection)) {
            return false;
        }

        return $modelClassReflection->hasMethod($methodName);
    }

    public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        return $this->getPresenterModel($classReflection)->getMethod($methodName, new OutOfClassScope());
    }

    protected function getPresenterModel(ClassReflection $classReflection): ?ClassReflection
    {
        if (!$classReflection->getAncestorWithClassName('Drupal\wmcontroller\Entity\PresenterInterface')) {
            return null;
        }

        $fileName = $classReflection->getFileName();

        if ($fileName === false) {
            return null;
        }

        $docComment = $classReflection->getNativeReflection()->getDocComment();

        if ($docComment === false) {
            return null;
        }

        $resolvedPhpDoc = $this->fileTypeMapper->getResolvedPhpDoc($fileName, $classReflection->getName(), null, null, $docComment);
        $propertyTags = $resolvedPhpDoc->getPropertyTags();

        if (!isset($propertyTags['entity'])) {
            return null;
        }

        return $propertyTags['entity']->getType()->getClassReflection();
    }
}
