# Terk Energy: render the printed company profile to PDF.
#
#   powershell -ExecutionPolicy Bypass -File print\build.ps1
#
# Uses headless Chrome, which is what the document was drawn against. Edge
# works too: change $browser below. Nothing else is needed, no install, no
# build tools.

$ErrorActionPreference = 'Stop'

$root   = Split-Path -Parent $PSScriptRoot
$source = Join-Path $root 'print\company-profile.html'
$out    = Join-Path $root 'assets\terk-energy-company-profile.pdf'

$candidates = @(
  "$env:ProgramFiles\Google\Chrome\Application\chrome.exe",
  "${env:ProgramFiles(x86)}\Google\Chrome\Application\chrome.exe",
  "$env:LOCALAPPDATA\Google\Chrome\Application\chrome.exe",
  "$env:ProgramFiles\Microsoft\Edge\Application\msedge.exe",
  "${env:ProgramFiles(x86)}\Microsoft\Edge\Application\msedge.exe"
)
$browser = $candidates | Where-Object { Test-Path $_ } | Select-Object -First 1
if (-not $browser) { throw 'No Chrome or Edge found. Install either one and run this again.' }

$profileDir = Join-Path $env:TEMP ('terk-pdf-' + [guid]::NewGuid().ToString('N'))

& $browser `
  --headless=new `
  --disable-gpu `
  --no-sandbox `
  --allow-file-access-from-files `
  --user-data-dir="$profileDir" `
  --virtual-time-budget=15000 `
  --print-to-pdf="$out" `
  "file:///$($source -replace '\\','/')"

# Chrome hands the print job to a child process and returns before the file is
# finished, so wait for it to appear and for its size to settle.
$deadline = (Get-Date).AddSeconds(90)
$last = -1
while ((Get-Date) -lt $deadline) {
    Start-Sleep -Milliseconds 700
    if (-not (Test-Path $out)) { continue }
    $size = (Get-Item $out).Length
    if ($size -gt 0 -and $size -eq $last) { break }
    $last = $size
}

Remove-Item $profileDir -Recurse -Force -ErrorAction SilentlyContinue

if (-not (Test-Path $out)) { throw 'Chrome did not write the PDF.' }
$mb = [math]::Round((Get-Item $out).Length / 1MB, 2)
Write-Output "Wrote $out  ($mb MB)"
