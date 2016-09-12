CREATE DATABASE aljcepeda;
\connect aljcepeda;

CREATE TABLE blog (
    url TEXT PRIMARY KEY,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    created timestamp with time zone DEFAULT now(),
    updated timestamp with time zone DEFAULT now()
);

CREATE FUNCTION blog_onUpdate()
RETURNS TRIGGER AS $$
BEGIN
   NEW.updated = now();
   RETURN NEW;
END;
$$ language 'plpgsql';

CREATE TRIGGER blog_didUpdate AFTER UPDATE ON blog
    FOR EACH ROW
    WHEN (OLD.* IS DISTINCT FROM NEW.*)
    EXECUTE PROCEDURE blog_onUpdate();
