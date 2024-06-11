#!/bin/zsh

toKebabCase() {
    local string="$1"

    # Add a hyphen before each uppercase letter (except at the start) and then convert to lowercase
    echo "$string" | sed -E 's/([^A-Z])([A-Z])/\1-\2/g' | tr '[:upper:]' '[:lower:]'
}

toCamelCase() {
    local input="$1"
    local words=()
    local result=""

    # Split input string into words
    IFS=' ' read -r -a words <<< "$input"

    # Convert first word to lowercase
    result="${words[0],,}"

    # Convert subsequent words to CamelCase
    for word in "${words[@]:1}"; do
        result+="${word^}"
    done

    echo "$result"
}

toUpperCamelCase() {
    local input="$1"
    local words=()
    local result=""

    # Split input string into words
    IFS=' ' read -r -a words <<< "$input"

    # Convert each word to CamelCase
    for word in "${words[@]}"; do
        result+="${word^}"
    done

    echo "$result"
}

toSnakeCase() {
    local input="$1"
    local result=""

    # Convert input string to lowercase and replace spaces with underscores
    result=$(echo "$input" | tr '[:upper:]' '[:lower:]' | tr ' ' '_')

    echo "$result"
}


