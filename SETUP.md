# Setup

This information is intended for first-time setup instructions. If you have worked on a similar project before, you may already have some of this installed.


## System

You will need to ensure that these are installed on your system before you can install other project dependencies:

- [Node.js](http://nodejs.org/) ~0.10.31

### Windows only

- Ruby >= 1.9.3 [http://rubyinstaller.org](http://rubyinstaller.org)
- Ruby DevKit [http://rubyinstaller.org](http://rubyinstaller.org) (version must be compatible with the Ruby version )

To install Ruby DevKit you need to:

1. Extract the contents to somewhere like C:\ruby-devkit
2. Open cmd prompt and cd to the above directory
3. Run `ruby dk.rb init`
4. Open the config.yml file created in the same location and check it has the Ruby path setup
5. Run `ruby dk.rb install`

### Ruby Gems

These Ruby gems are required:

- SASS ~3.4.6 [http://sass-lang.com](http://sass-lang.com)

To install on Windows, open the "Start command prompt with Ruby" and run:

```bash
$ gem install sass -v 3.4.6
# => once installed check by trying `sass -v`
```

### Node packages

Install the global node.js packages:

```bash
$ npm install -g grunt-cli
# => if you have used grunt before you probably have this (this can be run from any directory)

$ npm install -g bower
# => if you have used bower before you probably have this too (this can be run from any directory)
```