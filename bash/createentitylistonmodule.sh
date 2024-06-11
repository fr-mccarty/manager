#!/bin/zsh

# Check if argument is given
if [ $# -ne 4 ]; then
    echo "Missing arguments.  Usage for $0 is <project_path> <children_singular> <children_plural> <on_module>"
    exit 1
fi

# Assign arguments to variables
project_path=$1
children_singular=$2
children_plural=$3
on_module=$4

echo "Creating Entity List On Module"

source ./sed.sh
source ./casemixin.sh

kebab_children_name_singular=$(toKebabCase "$children_singular")
kebab_children_name_plural=$(toKebabCase "$children_plural")
kebab_on_module_name_singular=$(toKebabCase "$on_module")

# Livewire File
file_name="${project_path}/app/Livewire/${children_plural}On${on_module}.php"
cp ../laravel/EntityListOnModule.php "$file_name"
sed -i '' "s/%childrenNamePlural%/${children_plural}/g" "$file_name"
sed -i '' "s/%childrenNameSingular%/${children_singular}/g" "$file_name"
sed -i '' "s/%onModule%/${on_module}/g" "$file_name"
sed -i '' "s/%kebabChildrenNameSingular%/${kebab_children_name_singular}/g" "$file_name"
sed -i '' "s/%kebabChildrenNamePlural%/${kebab_children_name_plural}/g" "$file_name"
sed -i '' "s/%kebabOnModuleNameSingular%/${kebab_on_module_name_singular}/g" "$file_name"

# View File
file_name="${project_path}/resources/views/livewire/${kebab_children_name_plural}-on-${kebab_on_module_name_singular}.blade.php"
cp ../laravel/entity-list-on-module.blade.php "$file_name"
sed -i '' "s/%childrenNamePlural%/${children_plural}/g" "$file_name"
sed -i '' "s/%childrenNameSingular%/${children_singular}/g" "$file_name"
sed -i '' "s/%onModule%/${on_module}/g" "$file_name"
sed -i '' "s/%kebabChildrenNameSingular%/${kebab_children_name_singular}/g" "$file_name"
sed -i '' "s/%kebabChildrenNamePlural%/${kebab_children_name_plural}/g" "$file_name"
sed -i '' "s/%kebabOnModuleNameSingular%/${kebab_on_module_name_singular}/g" "$file_name"
