# dte-aerials-prototype
This is work done in 2021 as part of a planned update to the WSU Library's DTE Aerials portal, in order to provide a more usable interface than the current linked PDFs.

The file `dteJSONtoGEO.php` is used to process JSON files, produced (with some effort) from PDF maps in the DTE Aerials collection, and turn them into geoJSON files usable by LeafletJS. The original JSON files were placed in the `json/` directory, and the PHP script creates two geoJSON files in `geoJson/`, a single-line version and a human-readable version (`_Access`). These geoJSON files are erased and rewritten each time `dteJSONtoGEO.php` is run.

`index.hmtl` provides a simple prototype interface for displaying the geoGSON data using LeafletJS.
