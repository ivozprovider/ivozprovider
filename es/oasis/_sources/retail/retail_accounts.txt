.. _retail_accounts:

###############
Retail Accounts
###############

Retail Accounts are the main routable option in Retail clients.
More or less like :ref:`friends` are to Virtual PBX Companies, accounts 
contain the required configurable options to provide a SIP connectivity
service with IvozProvider and an external SIP entity.

.. warning:: Although both **Contract peering** and **Retail accounts** are defined by the
             **brand operator**, the first ones are designed to connect with the public network
             while the second ones connect the system with other SIP agents.

Types of retail accounts
========================

There are 2 main types of SIP PBX that can use retail with IvozProvider:

- **Direct connection PBX**: IvozProvider must be able to talk SIP directly with
  this kind of accounts by just redirecting the traffic to the proper port of
  the public IP address of the PBX.

- **PBX behind NAT**: Not directly accesible. This kind of PBX must register at
  IvozProvider (just like all the :ref:`Terminals <terminals>` do).

What kind of calls can be routed through a *Retail Account*?
============================================================

Contrary to Friends, **Retail Accounts** have some simplifications and limitations.

    - Retail Accounts only route their assigned DDIs
    - Retail Accounts only place externals calls to Contract Peerings
    - Retail Accounts only receive external calls from Contract Peerings

Retail Accounts Configuration
=============================

These are the configurable settings of *Retail accounts*:

.. glossary::

    Name
        Name of the **retail account**. This name must be unique in the whole brand so 
        it's recommended to use some kind of secuential identifier. This will also be used
        in SIP messages (sent **From User**).

    Description
        Optional. Extra information for this *retail account*.

    Password
        When the *retail account* send requests, IvozProvider will authenticate it using
        this password. Like in other SIP agents in IvozProvider **using password IS A MUST**.

    Direct connection
        If you choose 'Yes' here, you'll have to fill the protocol, address and
        port where this *retail account* can be contacted.

    Fallback Outgoing DDI
        External calls from this *retail account* will be presented with this DDI, **unless
        the source presented matches a DDI belonging to the account**.

    Country and Area code
        Used for number transformation from and to this retail account.

    Allowed codecs
        Like a other SIP entities, *retail accounts* will talk the selected codec.

    From domain
        Request from IvozProvider to this account will include this domain in
        the From header.


Voicemail service
-----------------

Each retail account has a separate voicemail mailbox to forward received calls using Call Forward Settings below.

.. important:: They can use **Voicemail service code** defined at brand level to listen to messages and to
                record a greeting locution different from the standard one.


Call Forward Settings
---------------------

Call forward settings can be configured per retail account. These are the fields and available values:

.. glossary::

    Enabled
        Determines if the forward must be applied or not. This way, you can have
        most used call forward configured and toggle if they apply or not.

    Call Forward type
        When this forward must be applied:

          - Inconditional: always.
          - No answer: when the call is not answered in X seconds.
          - Busy: When the retail account is busy (486 response code).
          - Not registered: when the retail account is not registered
            against IvozProvider.

    Target type
        What route will use the forwarded call.

            - Retail account voicemail
            - Number (external)

.. attention:: Calls forwarded to an external number by a call forward setting will keep the original
               caller identification, adding the forwarding info in a SIP *Diversion* header.


Asterisk as an account client
=============================

At the other end of a account can be any kind of SIP entity. This section takes
as example an Asterisk PBX system using SIP channel driver that wants to connect
to IvozProvider.

Account register
----------------

If the system can not be directly access, Asterisk will have to register in the
platform (like a terminal will do).

Configuration will be something like this:

.. code-block:: none

    register => account-name:account-password@ivozprovider-brand.sip-domain.com

Account peer
------------

.. code-block:: none

    [name-peer]
    type=peer
    host=ivozprovider-brand.sip-domain.com
    context=XXXXXX
    disallow=all
    allow=alaw
    defaultuser=account-name
    secret=account-password
    fromdomain=ivozprovider-brand.sip-domain.com
    insecure=port,invite

.. warning:: *Account clients* MUST NOT challenge IvozProvider. That's
             why the *insecure* setting is used here.


