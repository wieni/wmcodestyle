# Publishing modules

## Changelog
We keep a changelog following the
[keep a changelog 1.0.0](https://keepachangelog.com/en/1.0.0)
convention.

If the change is a result of an issue, add a link to that issue at the
end of the line.
```
- Document all command options and arguments
  ([#7](https://github.com/wieni/wmscaffold/issues/7))
```

Every repository should include a changelog in a `CHANGELOG.md` file in
the root folder.

## License
We license our Drupal modules and other packages published on GitHub
with the [MIT License](https://choosealicense.com/licenses/mit/). Every
repository should include a copy of this license in a `LICENSE` file in
the root folder.

## Checklists
### when publishing a new module
- [ ] Pick a good name
- [ ] Fix the code to follow the coding standards defined in this repository 
- [ ] Include a detailed README file, following our standards
- [ ] Include a LICENSE file
- [ ] Include a CHANGELOG file
- [ ] Define all Composer dependencies in composer.json
- [ ] Define all Drupal module dependencies in xxxx.info.yml
- [ ] Tag the first release with [Semantic Versioning](https://semver.org) in mind
- [ ] Submit the package on [Packagist](https://packagist.org/packages/submit)

### when updating an existing module
- [ ] Ask for code review if you're not confident about your changes
- [ ] Add a new entry to the CHANGELOG. Mention the tag and date if you're
 releasing immediately, if not add it to an _Unreleased_ section.
- [ ] Create a tag with [Semantic Versioning](https://semver.org) in mind
