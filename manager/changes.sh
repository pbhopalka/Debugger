
echo diff -U 0 --ignore-all-space "$1" "$2" | grep ^@ | wc -l
