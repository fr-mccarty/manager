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

# Create the the migration, the model, and a factory
cd "$project_path"
php artisan make:model "$module_name_singular" -m

sed -i '' "/use HasFactory;/a\\
\\
    public string \$moduleName = '${module_name_singular}';\\
    public string \$moduleNamePlural = '${module_name_plural}';\\
    public string \$moduleUrl = '${kebab_name_plural}';\\
" "./app/Models/${module_name_singular}.php"
