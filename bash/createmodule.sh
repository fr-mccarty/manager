#!/bin/zsh

# Check if argument is given
if [ $# -ne 3 ]; then
    echo "Missing arguments.  Usage for $0 is <project_path> <module_name_singular> <module_name_plural>"
    exit 1
fi

# Assign arguments to variables
project_path=$1
module_name_singular=$2
module_name_plural=$3

echo "Proceeding to create an entire module."
echo "Module Name Singular: ${module_name_singular}"
echo "Module Name Plural: ${module_name_plural}"


bash "./createmodel.sh" $project_path $module_name_singular $module_name_plural
bash "./createindexfiles.sh" $project_path $module_name_singular $module_name_plural
bash "./createeditfiles.sh" $project_path $module_name_singular $module_name_plural
bash "./createnavigation.sh" $project_path $module_name_singular $module_name_plural
