# yissn2q
Inputs year,issn number (format:2021,0007-9235).
Outputs best quartile of journal having issn/e-issn number published in a specific year, indexed in SCI-E or SSCI by Web of Science.

A SQLite database contains year, isnn, eissn, quartile fields. You must produce database file yourself, because data must be obtained from Journal Citation Reports, and copyrighted by Clarivate Analytics.

Look at "database content" folder, you can produce your SQLite database by using SQL commands, or importing from csv files. Year, issn and eissn fields are combined to create primary key, so that there can be only one (best) quartile for a journal published in specified year

