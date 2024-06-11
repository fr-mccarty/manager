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

source ./casemixin.sh

kebab_name_singular=$(toKebabCase "$module_name_singular")
kebab_name_plural=$(toKebabCase "$module_name_plural")

source ./sed.sh

# Livewire Edit Files
mkdir -p "${project_path}/app/Livewire"
edit_file_name="${project_path}/app/Livewire/${module_name_singular}Edit.php"
cp ../laravel/Edit.php "$edit_file_name"
replace_placeholders "$edit_file_name"

# View Edit File
mkdir -p "${project_path}/resources/views/livewire"
edit_file_name="${project_path}/resources/views/livewire/${kebab_name_singular}-edit.blade.php"
cp ../laravel/edit.blade.php "$edit_file_name"
replace_placeholders "$edit_file_name"