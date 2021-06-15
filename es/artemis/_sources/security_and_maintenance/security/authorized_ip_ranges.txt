.. _client_authorized_ip_ranges:

####################
Authorized IP ranges
####################

:ref:`Virtual PBX clients <vPBX clients>`, :ref:`retail clients` and :ref:`residential clients` can add IP addresses or ranges
(in CIDR format) with the combination of **Filter by IP address** field and **List of authorized sources** subsection.

.. warning:: On :ref:`wholesale clients` there is no **Filter by IP address** field as this type of clients are authenticated by IP, making
             filling **List of wholesale addresses** mandatory.

When **Filter by IP address** is enabled, users won't be allowed to connect from another network, even if they have
valid SIP credentials.

.. error:: Enabling **Filter by IP address** and leaving blank both **GeoIP countries** and **List of authorized sources**
           will prevent all calls.

.. tip:: Addresses listed in :ref:`IP filter blocked addresses` gives a clue of legitimate sources that should be
         added in **List of authorized sources** subsection.

.. _roadwarrior_users:

Roadwarrior users
-----------------

Some vPBX clients have roadwarrior users that travel often and connect from external
networks, forcing Clients to disable the IP filter security mechanism.

To solve this issue, there is a user option called **Calls from non-granted IPs**
that enables these users to call from non-granted IPs while remaining users' credentials
are still protected with IP filter mechanism.

When users like these call from non-granted IPs, their amount of concurrent
outgoing calls are limited to 1, 2 or 3 to avoid being a security breach.

.. note:: Only **generated calls** (both internals and externals) are limited,
          received calls are not affected by this setting.

To sum up, with this feature:

- There are users that are allowed to make a fixed amount of calls from
  non-granted IPs.

- These calls from non-granted IPs are counted and limited.

.. rubric:: Example 1 - Client without IP check

It doesn't matter if the user is allowed to make calls from non-granted IPs,
as there are no non-granted IPs.

.. rubric:: Example 2 - Client with IP check

- If the user is calling from one of the allowed IPs,
  it doesn't matter if the user is allowed to make calls from non-granted IPs:
  this calls are not counted nor limited.

- If the user is NOT calling from one of the allowed IPs, it is verified the
  amount of calls that this user is allowed to make. If the user is allowed to
  make calls from non-granted IPs and has not exceeded his limit, the call is 
  granted and counted.

To sum up, if **Calls from non-granted IPs** is set to *None* the user must fulfill the IP policy of the client.