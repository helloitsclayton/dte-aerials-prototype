# dteJSONtoGEO

Used to process JSON files, produced from PDF maps in the DTE Aerials collection, and turn them into geoJSON files usable by LeafletJS.

JSON files should be in a local directory, `json/`

Two geoJSON files will be created in the local directory `geoJson/`:
- `dteAerials.js` (single-line version)
- `dteAerials_Access.js` (human-readable version)

These files are erased and rewritten each time `dteJSONtoGEO.php` is run.

`index.hmtl` displays the geoGSON data using LeafletJS.
