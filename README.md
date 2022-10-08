# yissn2q
inputs year,issn number (format:2021,0007-9235)
outputs best quartile of journal having issn/e-issn number published in a specific year, indexed in SCI-E or SSCI by Web of Science
database contains year, isnn, eissn, quartile values
you must produce database file yourself, because data must be obtained Journal Citation Reports, and copyrighted by InCites
look at "database content" folder, you can produce your SQLite database by using SQL commands, or importing from csv files
year, issn and eissn fields are combined to create primary key, so that there can be only one (best) quartile for a journal published in specified year
