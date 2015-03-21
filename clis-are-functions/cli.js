#!/usr/bin/env node

/*
 * This file is an example of a function as a CLI.
 * Type a command like `./function.js --firstWord foo --secondWord bar`
 */

process.stdout.write('\n\n')
process.stdout.write('Node automatically fills entries into process.argv from info on the command line.')
process.stdout.write('\n\n')
console.log(process.argv)
process.stdout.write('\n\n')

process.stdout.write('Here are the parameters parsed from argv.')
process.stdout.write('\n\n')
argv = parseArgv(process.argv)
console.log(argv)
process.stdout.write('\n\n')

process.stdout.write('Now we feed those parsed parameters to our function and voila!')
process.stdout.write('\n\n')
buildSentence(argv)
process.stdout.write('\n\n')

/*
 * Functions
 */

function parseArgv(argv) {
  params = {}
  argv.forEach(function(arg, i) {
    if (arg.substr(0, 2) == '--') {
      paramName = arg.substr(2, arg.length)
      nextArg = argv[i+1]
      if (typeof nextArg == 'string' && nextArg.substr(0, 2) == '--') {
        params[paramName] = true
      }
      else {
        params[paramName] = nextArg
      }
    }
  })
  return params
}

function buildSentence(argv) {
  process.stdout.write('The ' + argv['firstWord'] + ' is ' + argv['secondWord'] + '.')
}
