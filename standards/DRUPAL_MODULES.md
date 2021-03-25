# Modules
> A module is a set of PHP, JavaScript, and/or CSS files that extends site features and adds functionality.

_Source: [Drupal user guide](https://www.drupal.org/docs/user_guide/en/understanding-modules.html)_

## Custom modules
Every site has custom code that provides site-specific logic, tweaks the administration interface or ties together 
functionalities from contributed packages. We usually keep all custom code in a single custom module named **wmcustom**.
Always using the same name for your custom module gives you the advantage of making it easy to copy code between 
projects.

- https://phppackagechecklist.com/

## Using contributed modules
It's not always necessary to write custom code to add a certain functionality to your website. A well written PHP 
package or Drupal module can save you a lot of time and may be more stable than writing new code. Here are some things 
to look out for when considering using contributed code:

- **Is the package maintained?** Look at the date of the last commit or release. Are issues being responded to?
- **Do you think the package will stay maintained in the future?** Does the package have a lot of users? Is the 
  maintainer actively working on the package?
- **Is the package well-written?** Look through the code before using it. Is it following best practices? Messy code 
  might be a red flag, but on the other hand, if it's actively being maintained it might not be a problem.
- **Is it worth it?** If certain functionality can be achieved with a minimal amount of custom code, it might not be 
  worth it to add a new dependency to your project.

### Issues and patches
It's not uncommon for Drupal modules or for Drupal core to have unfixed issues. Luckily, there are a lot of active 
Drupal users, so these issues rarely go unnoticed. 

Don't immediately give up when encountering an issue with a 
contributed module: chances are the issue is already reported in the issue queue and a WIP fix is already present in the 
form of a patch. If you add that patch to your project using 
[`cweagans/composer-patches`](https://github.com/cweagans/composer-patches), it will automatically be applied and you'll 
have a temporary fix while waiting for a new release.

Make sure to include the issue number and title when adding a patch to your composer.json, this will make it easier to 
remember what exactly the patch is for.

In case you don't find an existing issue and/or patch, you can try to fix the issue yourself. If you do, don't forget to
create an issue in the issue queue and leave the patch you created. Even if it's not perfect, it might be useful for
other people encountering the same issue.

## Contributing modules
We have the habit of creating reusable Drupal modules for functionalities we need for more than one project. Most of the
time, we're also making them available to everyone by sharing the code on Github. Following are some things to consider 
when working on our open source modules.

### Read Me
The README file is the landing page of your module. It should tell you what the module can be used for and how to use 
it.  We generally have the same sections for every module:
- A **header** with the name of the module, a one-line description and some badges with statistics
- **Why?** What's the point of this module? What does it do? If a similar module already exists, what's the added value 
  of this one?
- **Installation**. A Composer command, necessary patches and/or other instructions. 
- **How does it work?** Documentation on how to use the module. Should be divided in subheadings or moved to a separate 
  file depending on the size.
- **Changelog**. A link to the changelog.
- **Security**. Information on how security issues should be reported.
- **License**. _Distributed under [license name]_ + a link to the license file. 

### Changelog
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

### License
We license our Drupal modules and other packages published on GitHub
with the [MIT License](https://choosealicense.com/licenses/mit/). Every
repository should include a copy of this license in a `LICENSE` file in
the root folder.

### Checklists
#### when publishing a new module
- [ ] Pick a good name
- [ ] Fix the code to follow the coding standards defined in this repository 
- [ ] Include a detailed README file, following our standards
- [ ] Include a LICENSE file
- [ ] Include a CHANGELOG file
- [ ] Define all Composer dependencies in composer.json
- [ ] Define all Drupal module dependencies in xxxx.info.yml
- [ ] Tag the first release with [Semantic Versioning](https://semver.org) in mind
- [ ] Submit the package on [Packagist](https://packagist.org/packages/submit)

#### when updating an existing module
- [ ] Ask for code review if you're not confident about your changes
- [ ] Add a new entry to the CHANGELOG. Mention the tag and date if you're
 releasing immediately, if not add it to an _Unreleased_ section.
- [ ] Create a tag with [Semantic Versioning](https://semver.org) in mind
