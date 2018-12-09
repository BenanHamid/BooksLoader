CREATE TABLE IF NOT EXISTS public.book  (
   id SERIAL PRIMARY KEY,
   author VARCHAR(100) NOT NULL,
   book_name VARCHAR(100) NOT NULL,
   book_id INTEGER NOT NULL UNIQUE
);

CREATE INDEX book_author_ind ON public.book(author);