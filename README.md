# This module is unused and was originally intended to do what the reference_value_pair module does.  We do not use, nor need this module. 
# iDC Field Widgets

This module provides Field Widgets for our Islandora project, iDC, at JHU Sheridan Libraries.
Right now there is only one widget provided:
 - String With Lang Widget

Any widgets here are intended to be used with [Islandora 8](https://github.com/Islandora/islandora/tree/8.x-1.x).

## String With Lang Widget

We needed a way to tag a field with a language in Islandora. Drupal provides a way to tag and translate a node, or
the whole website, but not a way to simply mark a field as being in a certain language.
As we need no reasoning over this language, it seems feasible to just allow a field to be tag with a language
from a taxonomy, which is all that this particular widget does.

This Drupal 8 module creates a new field type which is simply a string and a field containing
entries from a Language taxonomy. A user can fill in the string and choose a language to associate it with.

This widget assumes there is a taxonomy named Language available for use.

## Requirements

This module current does not require other modules.

## Installation

## Configuration


## Documentation


## Troubleshooting/Issues

## Maintainers/Sponsors

Current maintainers:

* [Bethany Seeger ](https://github.com/bseeger)

## Development

