.. _retail_ddis:

############
Retail DDIs
############

DDIs are the external entry point from Contract Peerings to Retail Clients that
can be routed through Retail Accounts.


******************
DDI filters
******************

We can assign an **external call filter** configured in :ref:`previous section 
<retail_filters>`. Contrary to Virtual PBX External Call fiters, Retail DDIs
filters only allow static redirection to another external number.

*****************
Retail DDI routes
*****************

Retail DDIs can only be routed to a :ref:`Retail Accounts <retail_accounts>`
or :ref:`Virtual Fax <faxing_system>`.

.. hint:: Routing a DDI through a Retail account will allow to place external calls
    from that account presenting that DDI as origin.

**********
Recordings
**********

If Retail Client has *Recordings* feature enabled, DDIs can also record incoming and/or 
outgoing calls.
