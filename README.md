# StringNetFormat
.NET String.Format PHP function

for .NET developers using PHP (happens :) ), a string.Format (actually string replace) compatible string function (see code for details)

Future targets:
* add Format specifics to placeholders (see: https://docs.microsoft.com/en-us/dotnet/api/system.string.format?view=net-6.0)

Example usage:
```
print StringNetFormat("Hallo {0}, {1}, and {2}, ({0}, {1}, {2})", array ("Harry", "Doreen", "Wakka")); 
```
