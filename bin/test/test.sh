#!/bin/sh


curl http://localhost:10200/api/v1 -D - \
    -H 'Content-Type: application/json' \
    -d '{
      "jsonrpc": "2.0",
      "method":"sum",
      "params":{
        "firstNumber": 20,
        "secondNumber": 1
        }
    }'