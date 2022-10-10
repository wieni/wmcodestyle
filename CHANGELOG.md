# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.10.0] - 2022-10-10
### Added
- `Php81` RuleSet.
  - With the `BlankLineAroundClassBodyFixer`. See [PHP-CS-Fixer/#3653](https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/3653)

### Changed
- **[Symfony]** Support version `^6` of Symfony
- **[Rector]** Update Rector to 0.13

## [1.9.0] - 2021-11-16
### Changed
- **[PHPStan]** Update PHPStan and related packages to 1.0
- **[Rector]** Update Rector to 0.12.4

## [1.8.0] - 2021-10-31
Check [UPGRADING.md](UPGRADING.md) for instructions on breaking changes.

### Changed
- Allow Symfony 5 dependencies
- **[PHP-CS-Fixer]** Update to v3
- **[Rector]** Include more file extensions in configs
- **[Rector]** Include PHP 8 & PHP 8.1 setlists in configs
- **[Rector]** Change rulesets to remove rules of existing rulesets instead of completely redefining them
- **[Rector]** Add a minimum patch version. This makes it easier to keep track of what version our rule set overrides
 are based on

### Removed
- Remove `mglaman/phpstan-drupal` and `phpstan/phpstan-symfony` dependencies and add recommendations to README instead.

## [1.7.7] - 2021-07-30
### Added
- Add written coding standards about PSR, Drupal modules and model–view–controller (and presenter)
- Update hook_event_dispatcher Rector set to replace `HookEventDispatcherEvents` with `HookEventDispatcherInterface`

### Changed
- Update PHPStan to ^0.12.65

## [1.7.6] - 2021-05-31
### Fixed
- Update Rector to ^0.11

## [1.7.5] - 2021-05-26
### Fixed
- Add support for latest Rector dev

## [1.7.4] - 2021-05-25
### Changed
- Replace deprecated `rector/rector-prefixed` with rector/rector

## [1.7.3] - 2021-03-31
### Fixed
- Fix hook_event_dispatcher Rector rule set
- Remove reference to removed argument
- Fix references to Rector set lists

## [1.7.2] - 2021-03-26
### Fixed
- Fix references to Rector set lists

## [1.7.1] - 2021-03-26
### Changed
- Update `rector/rector-prefixed`

## [1.7.0] - 2021-03-24
### Added
- Add Rector rule set to update the hook_event_dispatcher module
- Add drupal-module & drupal-site Rector configs

### Changed
- Update dependency injection Rector rule set
- Remove ChangeOrIfReturnToEarlyReturnRector Rector rule

### Fixed
- Fix Parse error in Php80.php

## [1.6.0] - 2021-03-12
### Added
- Add PHP 8 support
- Add [Rector](https://github.com/rectorphp/rector) dependency & rule sets
- Add [phpstan-symfony](https://github.com/phpstan/phpstan-symfony)

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
