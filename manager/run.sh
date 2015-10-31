chmod +x "$1"
timeout 2 "$1" < "$3" > "$2"
diff -U 0 --ignore-all-space "$2" "$4" | grep ^@ | wc -l
