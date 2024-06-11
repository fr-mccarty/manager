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

# Add Routes
file_name="${project_path}/routes/web.php"

sed -i '' "/\/\/ Insert Above/i\\
    Route::get('/${kebab_name_plural}/create', \\\App\\\Livewire\\\\${module_name_singular}Edit::class)->name('${kebab_name_plural}.create');\\
    Route::get('/${kebab_name_plural}/{id}', \\\App\\\Livewire\\\\${module_name_singular}Edit::class)->name('${kebab_name_plural}.edit');\\
    Route::get('/${kebab_name_plural}', \\\App\\\Livewire\\\\${module_name_plural}Index::class)->name('${kebab_name_plural}.index');\\
\\
" "$file_name"

# Add Navigation
file_name="${project_path}/config/constants.php"

sed -i '' "/\/\/ Insert Above/i\\
        ['label' => '${module_name_plural}', 'route' => '${kebab_name_plural}.index'],\\
\\
" "$file_name"
