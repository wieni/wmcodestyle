# Git

## Commit messages

### How to write a git commit message?
There have been numurous blog posts and articles about how to format git 
 commit messages, so we're not going to reinvent the wheel. We're following
 _The seven rules of a great Git commit message_ by Chris Beams:

- Separate subject from body with a blank line
- Limit the subject line to 50 characters
- Capitalize the subject line
- Do not end the subject line with a period
- Use the imperative mood in the subject line
- Wrap the body at 72 characters
- Use the body to explain what and why vs. how

More information about how to write a git commit message can be found in 
 his [blog post](https://chris.beams.io/posts/git-commit).

### Rule of thumb
As a rule of thumb, if your commit messages look like this you're probably 
 doing fine.
 
![](https://i.imgur.com/yL03GkB.png)

### Extra: issue numbers
Whenever possible, mention the issue number in the commit message and 
 preferably in the following format:

```
#495 Reindex all units
```

Doing so, your commit is automatically mentioned in the issue for future reference when using [GitLab](https://docs.gitlab.com/ee/topics/gitlab_flow.html#linking-and-closing-issues-from-merge-requests). 

### Why does all this matter?
- Keeps the git log clean and easy to read
- Can be useful when using tools like 
 [git-standup](https://github.com/kamranahmedse/git-standup)
- Can be useful when updating the changelog
