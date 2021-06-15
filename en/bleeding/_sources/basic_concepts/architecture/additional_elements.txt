IvozProvider has multiple elements that are not exposed to the *external world*
but play a crucial task.

The most remarkable profile is **database profile** that gathers all the
information of the platform and shares it between the majority of software packaged.
IvozProvider uses `MySQL database engine <https://www.mysql.com/>`_ for this task.

Another remarkable task is **asynchronous tasks handler** in charge of encoding recordings,
generating invoices, reloading services, importing data, etc.
