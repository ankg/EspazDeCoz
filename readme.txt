This is the web app called CourseSpace(tentative) made by a team of four.
It is an interaction platform for students and professors, to discuss about both courses that interst them and concern them
Steps to do to setup:
1. Get a copy of composer.phar by running on the terminal curl -s https://getcomposer.org/installer | php.
2. Create a composer.json file and add to that the lines
{
    "require": {
        "torophp/torophp": "dev-master"
    }
}
3. Run the command php composer.phar install . Installs the dependencies.
