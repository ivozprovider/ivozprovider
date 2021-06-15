################
SIP Antiflooding
################

SIP Proxies included in IvozProvider installation for SIP signalling use
`PIKE module <http://kamailio.org/docs/modules/5.1.x/modules/pike.html>`_ to avoid DoS attacks.

This module keeps trace of incoming request's IP address and blocks the ones that exceed the limit on a given time
interval.

.. warning:: **IPs are not blocked permanently**, they are blocked for 5 minutes. After this time, they are allowed again
             as long as their incoming request rate don't exceed the limit.

.. tip:: :ref:`Antiflood banned IPs` shows a list of addresses that have been banned at some point.

Current configuration parameters are:

- **Sampling time interval**: 2 seconds.

- **Threshold per time unit**: 100 requests.


This means that *any IP address that sends more than 100 requests in a 2-second-time-interval will be blocked (ignored)
for 5 minutes. After this time, it will be unblocked and its request rate will be evaluated again*.

.. note:: Be aware that some requests are not taken into account by antiflood, continue reading please.

Which requests are taken into account in KamUsers?
==================================================

Client side requests usually traverse 2 different phases:

- Step 0: initial checks, endpoint identification and authentication.

- Step 1: remaining logic.

Antiflood will take into account:

- SIP OPTIONS

- Requests failing during step 0:

  - Requests not using SIP domain in KamUsers (except wholesale).

  - Requests from non-existing AoRs in KamUsers.

  - Requests failing SIP authentication with wrong passwords in KamUsers.

- Initial INVITE requests reaching step 1 (aka: new call establishments of legitimate clients).


.. tip:: Note that antiflood will not take into account successful REGISTER/SUBSCRIBE cycles.

Which requests are taken into account in KamTrunks?
===================================================

Antiflood will take into account:

- SIP OPTIONS from non-DDIproviders.

- Non-DDIproviders talking to KamTrunks.

.. tip:: Note that antiflood will not take into account DDI Provider requests to KamTrunks.