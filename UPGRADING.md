# Upgrade Guide

This document describes breaking changes and how to upgrade. For a
complete list of changes including minor and patch releases, please
refer to the [`CHANGELOG`](CHANGELOG.md).

## 1.8.0
- `friendsofphp/php-cs-fixer` was updated to v3. If you have a direct dependency to this package, change it and follow
  [their upgrade guide](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/UPGRADE-v3.md) for any custom usage.
- The `mglaman/phpstan-drupal` and `phpstan/phpstan-symfony` dependencies are removed. If you're using wmcodestyle in a 
  Symfony or Drupal project, add these as direct dev dependencies instead.
