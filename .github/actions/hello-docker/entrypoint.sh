#!/bin/sh -l

# if [ true ]
# then
#     echo "Error"
#     exit 1
# fi

echo "::debug ::Debug Message"
echo "::warning ::Warning Message"
echo "::error ::Error Message"

echo "::add-mask::$1"
echo "Hello $1"
time=$(date)
echo "::set-output name=time::$time"

echo "::group::Logging expandable Logs"
echo "Some Log 1"
echo "Some Log 2"
echo "Some Log 3"
echo "Some Log 4"
echo "::endgroup::"

echo "::set-env name=HELLO::hello"