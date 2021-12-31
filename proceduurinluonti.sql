
-- Luodaan stored procedure GetAliasesByRegion imbd tietokantaan
DELIMITER $$
CREATE PROCEDURE GetAliasesByRegion(
	IN regionName VARCHAR(4)
)
BEGIN

SELECT title FROM aliases WHERE (region = regionName)
GROUP BY title_id ORDER BY title LIMIT 10;

END$$
DELIMITER ;