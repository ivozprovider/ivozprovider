########################
Anti brute-force attacks
########################

IvozProvider ships a simple anti brute-force attack in KamUsers that bans sources after continuous SIP auth failures
from same IP address.

It works like this:

- On SIP failures (invalid user or invalid password cases only), a counter is increased:

  - Key: fromUsername@fromDomain::source_ip
     - e.g. terminal@vpbx.domain.net::1.2.3.4

- Counter is increased on every failure.

- When counter reaches 100, that specific source (user + domain + ip) is banned for 12 hours.


After 12 hours, source is accepted again and:

- Counter starts counting again from 80.

- If it reaches 100 again, it is banned for another 12 hours.

.. tip:: See :ref:`Brute-force attacks` for currently blocked sources.
