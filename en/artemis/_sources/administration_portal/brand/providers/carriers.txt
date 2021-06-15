.. _carriers:

********
Carriers
********

Carriers are used for placing external outgoing calls.

This are the fields that define a carrier:

.. hint:: Some fields described below may not be visible depending on enabled features.

.. glossary::

    Name
        Used to reference this Carrier.

    Description
        Optional field with any required extra information.

    Numeric Transformation
        Transformation that will be applied to the origin and destination of the
        outgoing numbers that use this Carrier
        (see :ref:`Numeric transformations`).

    Externally rated
        This setting requires the external tarification module and allows
        tarification on special numbers. This module is not standard so don't
        hesitate in :ref:`contact us <getting_help>` if you are interested.

    Calculate cost
        If set, IvozProvider will calculate the cost of the call using the carrier's active rating profile.

    Currency
        Chosen currency will be used in cost calculation, balance movements and
        remaining money operations of this carrier.

    Local socket
        Selected address will be used as source address for signalling with this carrier. Brand operator can choose among
        addresses assigned by main operator via :ref:`Brands`. Read :ref:`Proxy Trunks` for further details.

    Media relay set
        Media-relays can be grouped in sets to reserve capacities or on a geographical purpose. Selected set will be used
        in calls through this specific carrier. This field in only seen by Global administrator (aka God).

    Status
        Non-responding carrier servers are inactivated until they respond to OPTIONS ping request. This icon is green if
        every carrier server of given carrier is active, red if they are all inactive and yellow if just some of them are inactive.

.. hint:: If you want carrier-side media handled by the same mediarelay set than client-side, select "Client's default".

Cost calculation
****************

If *Calculate cost* is enabled, *Rating plans* can be linked to carriers for cost calculation (see
:ref:`Assigning rating plans to carriers`) and a balance is attached to each carrier. Whenever a carrier is used for
placing a call, this balance will be decreased using carrier's active rating profile.

Besides:

- Carrier balance can be increased/decreased with *Balance operations*.

- These operations are listed in *List of Balances movements*.

- *Balance notifications* can be configured to be notified when balance reaches a given threshold.

.. important:: Contrary to clients' balances, **carriers' (negative/zero) balances won't disable the carrier**.


Carrier Servers
***************

A **Carrier Server** is a SIP server associated to an IP Provider. Carrier servers
are used for placing outgoing calls by using :ref:`Outgoing routings`.

.. glossary::

    SIP Proxy
        IP address (or DNS registry) of the Carrier Server. You can also specify
        a port if it's different from 5060.

    Outbound Proxy
        Usually this is left empty. It can be filled with the IP address of the
        **SIP Proxy** domain (to avoid DNS resolution, but keeping the domain
        in the SIP messages). It works like a web proxy: instead of sending the
        SIP messages to destination **SIP Proxy**, they will be sent to the
        IP:PORT of this field.

    URI Scheme
        Supported schemes are sip and sips. Use 'sip' in case of doubt.

    Transport
        Supported transport protocols. Use 'udp' in case of doubt.

    Requires Authentication
        Some Carriers validate our platform by IP, others require
        each session that we want to establish. For this last case, this section
        allows to configure user and password for this authentication.

    Call Origin Header
        Some Providers get origin from SIP From header. Others use the From
        header for accounting and need extra headers to identify the origin.
        In case of doubt leave **PAI** checked.

    From header customization
        For those providers that show origin in other headers (PAI/RPID), it is
        possible that request that From User have the account code being used
        and from domain their SIP domain. In case of doubt, leave empty.

    Status
        Non-responding carrier servers are inactivated until they respond to a OPTIONS ping request. This icon shows
        if carrier server is active or inactive (and being pinged via OPTIONS message until gets back).

.. tip:: There are many fields to establish *peering* with multiple kind of
   carriers, but usually with the name and SIP Proxy will be enough (for
   those that validate our platform by IP) and Authentication (for those that
   won't).

.. warning:: In case of defining multiple Carrier Servers for a single
   Carrier, IvozProvider will balance and failover using all of them.
   Like with Application Servers, it will disable those who doesn't respond to
   our requests.

List of external calls
**********************

You can see external calls placed through a given carrier using this option. You will see the same fields as in
:ref:`External calls` but filtered for the chosen carrier.

.. error:: It is compulsory to have **a valid brand URL** in order to use *Export to CSV* feature in this subsection.
