#!/usr/bin/env bash

commit_msg="${1}"
commit_msg_lines=()
error_msg="[COMMIT FAILED]"
allowed_subject_verbs=('build:' 'chore:' 'ci:' 'docs:' 'feature:' 'fix:' 'refactor:' 'revert:' 'style:')
allowed_subject_defs=(
'build: does something to clean up the build process'
'chore: updates the allowed subject verbs script for commit messages'
'ci: updates the ci tooling'
'docs: updates all the inline docs'
'feature: adds a new page to the backend for something'
'fix: fixes bug that was causing the page to crash'
'refactor: cleans up the code in the .infrastructure folder'
'revert: reverts the prior commit due to production bug'
'style: runs formatting over evertyhing'
)

# Splits the commit msg into separate lines and adds them to an array
split_commit_msg() {
    while IFS= read -r line; do

        # Trim trailing spaces from lines
        shopt -s extglob
        line="${line%%*( )}"
        shopt -u extglob

        if [[ ! "${line}" =~ ^\; ]] && [[ ! "${line}" =~ ^# ]]; then
            commit_msg_lines+=("${line}")
        fi

    done < <(cat ${commit_msg})
}

# Validates the commit msg
validate_commit_msg() {
    split_commit_msg

    # Store the subject
    local subject="${commit_msg_lines[0]}"

    # Stop validation if the message is empty or no subject is set
    # if [[ -z "${commit_msg_lines[*]}" ]] || [[ -z "${subject}" ]]; then
    #     exit 0
    # fi

    if [[ "${subject}" =~ ^[[:space:]]+ ]]; then
        echo "${error_msg} The subject can not have leading whitespace"
        exit 1;
    fi

    if [[ $(echo "${subject}" | wc -w) -eq 1 ]]; then
        echo "${error_msg} The subject has to contain more than 1 word"
        exit 1
    fi

    if [[ "${#subject}" -gt 80 ]]; then
        echo "${error_msg} Limit the subject line to 80 characters (${#commit_msg_lines[0]} characters used)"
        exit 1
    fi

    if [[ ! "${subject}" =~ [^\.]$ ]]; then
        echo "${error_msg} Do not end the subject line with a period"
        exit 1
    fi

    local first_word=$(echo "${subject}" | awk '{print $1;}')
    local is_allowed=false

    for verb in "${allowed_subject_verbs[@]}"; do
        if [[ "${verb}" == "${first_word}" ]]; then
            is_allowed=true
        fi
    done

    if [[ "${is_allowed}" == false ]]; then
        echo "${error_msg} Use the imperative mood in the subject line"
        echo "Your subject has to start with one of the following verbs (with message example):"
        printf -- '    - %s\n' "${allowed_subject_defs[@]}"
        exit 1
    fi
}

validate_commit_msg

# sed -i.bak '/^\;/ d' $1
# sed -i.bak '/^#/ d' $1

# sed -i.bak -e :a -e '/^\n*$/{$d;N;ba' -e '}' $1

# branch="$(git symbolic-ref --short HEAD)"
# if [[ -z "${branch}" ]]; then
#     echo "${error_msg} Could not determine the branch name"
#     exit 1
# fi

# ticket=$(echo "$branch" | sed 's/\-.*//')
# sed -i.bak -e "1s/^/#$ticket /" $1
