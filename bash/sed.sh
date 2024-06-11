#!/bin/zsh

# Function to replace placeholders
# moduleNameSingular is in Upper Camel Case already with no spaces

replace_placeholders() {
    local file_name=$1
    sed -i '' "s/%moduleNameSingular%/${module_name_singular}/g" "$file_name"
    sed -i '' "s/%kebabNameSingular%/${kebab_name_singular}/g" "$file_name"
    sed -i '' "s/%moduleNamePlural%/${module_name_plural}/g" "$file_name"
    sed -i '' "s/%kebabNamePlural%/${kebab_name_plural}/g" "$file_name"
}
