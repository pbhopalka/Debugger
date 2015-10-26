chmod +x "$1"
timeout 2 "$1" > "$2"
diff -U 0 --ignore-all-space "$2" "$3" | grep ^@ | wc -l
