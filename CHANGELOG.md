# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.5.0] - 2021-03-10
### Changed
- Temporary disable "binary_operator_spaces" rule for " | " [#12](https://github.com/wieni/wmcodestyle/pull/12)

## [1.4.0] - 2020-12-08
### Added
- Add rulesets for PHP 7.4 & 8.0
- Disable risky rules by default for PHP-CS-Fixer

### Changed
- Increase the minimum version of PHPStan & PHP-CS-Fixer
- Update drupal-module & drupal-site PHPStan configs
- Update PHP-CS-Fixer configs

## [1.3.0] - 2020-11-01
### Added
- Add drupal-module PHPStan config

### Changed
- Update drupal-site PHPStan config

## [1.2.0] - 2020-05-09
### Added
- Add best practices about git commit messages
- Add best practices about publishing modules

### Changed
- Change repository description
- Update README
- Update regex of the _Implicit array creation is not allowed_ 
 PHPStan rule.

## [1.1.0] - 2020-03-26
### Added
- Add PHPStan & contrib rule packages
- Add custom rule to resolve methods from [`wieni/wmcontroller`](https://github.com/wieni/wmcontroller) presenter methods
- Add `drupal-site` & `php-project` PHPStan configs to include in other projects
- Add PHPStan to own coding standard fixers

### Changed
- Add composer.lock to .gitignore

## [1.0.1] - 2020-01-20
### Changed
- Disable `global_namespace_import` & `single_line_throw` rules
- Remove maintainers section & update security email address in README

## [1.0.0] - 2019-12-17
Initial release
