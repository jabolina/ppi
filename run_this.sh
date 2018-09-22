#!/bin/sh

FILE_PATH=".git/hooks/pre-commit"

if [ -e $FILE_PATH ]; then
    echo "Ready, pre-commit already exist!";
else
    echo "Blocking commit directly to master";

    touch $FILE_PATH
    echo "branch=\"\$(git rev-parse --abbrev-ref HEAD)\"" >> $FILE_PATH
    echo "if [ \"\$branch\" = \"master\" ]; then" >> $FILE_PATH
    echo "    echo \"You can't commit directly to master branch!\"" >> $FILE_PATH
    echo "    echo \"Create you're branch then make a pull request.\"" >> $FILE_PATH
    echo "    exit 1;" >> $FILE_PATH
    echo "fi" >> $FILE_PATH

    chmod +x $FILE_PATH
    echo "Done.";
fi

