.. _retail_accounts:

###############
Retail Accounts
###############

Retail Accounts are the main routable option in Retail clients.
More or less like :ref:`friends` are to Virtual PBX Clients, devices
contain the required configurable options to provide a SIP connectivity
service with IvozProvider and an external SIP entity.

.. warning:: Although both **Carriers/DDI Providers** and **Retail Accounts** are defined by the
             **brand operator**, the former are designed to connect with the public switched telephony network
             while the latter connects the system with our clients' SIP entities.

Types of retail accounts
========================

There are 2 main types of SIP endpoints that can use retail with IvozProvider:

- **Direct connection endpoint**: IvozProvider must be able to talk SIP directly with
  this kind of devices by just forwarding the traffic to the proper port of
  the public IP address of the PBX.

- **Endpoint behind NAT**: Not directly reachable. This kind of endpoint must register at
  IvozProvider (just like all the :ref:`Terminals <terminals>` do).

What kind of calls can be routed through a *Retail Account*?
============================================================

Contrary to Friends, **Retail Accounts** have some simplifications and limitations:

    - Retail Accounts only route their assigned DDIs
    - Retail Accounts only place externals calls to Carriers
    - Retail Accounts only receive external calls from DDI Providers

Retail Accounts Configuration
=============================

These are the configurable settings of *Retail accounts*:

.. glossary::

    Name
        Name of the **retail account**. This name must be unique in the whole brand so 
        it's recommended to use some kind of sequential identifier. This will also be used
        in SIP messages (sent **From User**).

    Description
        Optional. Extra information for this *retail account*.

    Password
        When the *retail account* send requests, IvozProvider will authenticate it using
        this password. Like remaining SIP entities in IvozProvider (except Wholesale) **using password IS MANDATORY**.

    Direct connectivity
        If you choose 'Yes' here, you'll have to fill the protocol, address and
        port where this *retail account* can be contacted.

    Numeric transformation
        Numeric transformation set that will be applied when communicating with this device.

    Fallback Outgoing DDI
        External calls from this *retail account* will be presented with this DDI, **unless
        the source presented matches a DDI belonging to the retail client**.

    From domain
        Request from IvozProvider to this account will include this domain in
        the From header.

    DDI In
        If set to 'Yes', set destination (R-URI and To) to called DDI when calling to this endpoint. If set 'No', username
        used in Contact header of registration will be used, as specified in SIP RFC (retail account name will be used for
        endpoints with direct connectivity). Defaults to 'Yes'.

    Enable T.38 passthrough
        If set to 'yes', this SIP endpoint must be a **T.38 capable fax sender/receiver**. IvozProvider
        will act as a T.38 gateway, bridging fax-calls of a T.38 capable carrier and a T.38 capable device.

    RTP Encryption
        If set to 'yes', call won't be established unless it's possible to encryption its audio. If set to 'no',
        audio won't be encrypted.

    Multi Contact
        Same SIP credentials can be configured in multiple SIP devices. In that case, all devices ring
        simultaneously when receiving a call. Setting this toggle to 'No' limits this behaviour so that
        only latest registered SIP device rings.

.. warning:: All retail accounts within a retail client will have the transcoding capabilities configured at client level.

.. tip:: On retail account edit screen **id** field shows internal identification number assigned to the retail account.
         This id is transported to *Endpoint Id* field in *External Calls* section for CSV export.

.. tip:: Retail account can be contacted due to calls to several DDIs. *DDI In* setting allows remote SIP endpoint to
         know which number caused each call, setting that number as destination (R-URI and To headers). This way, retail
         account can handle calls differently.

Voicemail settings
==================

There is no voicemail service for retail clients.

Call forwarding settings
========================

There are 2 types of call forward settings for retail accounts, both pointing to an external number:

- Unconditional call forward.

- Unreachable call forward.

The last one will be called whenever the retail account cannot be reached:

- Direct connectivity accounts: when no answer is received from defined address.

- Accounts using SIP register: when no answer is received from last contact address or when no active register is found.

.. tip:: Unconditional call forward has precedence over unreacheable call forward.

.. warning:: Retail accounts marked as T.38 won't have any call forward settings.

Asterisk as a retail account
============================

At the other end of a account can be any kind of SIP entity. This section takes
as example an Asterisk PBX system using SIP channel driver that wants to connect
to IvozProvider.

Account register
----------------

If the system can not be directly access, Asterisk will have to register in the
platform (like a terminal will do).

Configuration will be something like this:

.. code-block:: none

    register => retailAccountName:retailAccountPassword@ivozprovider-brand.sip-domain.com

Account peer
------------

.. code-block:: none

    [retailAccountName]
    type=peer
    host=ivozprovider-brand.sip-domain.com
    context=XXXXXX
    disallow=all
    allow=alaw
    defaultuser=retailAccountName
    secret=retailAccountPassword
    fromuser=retailAccountName
    fromdomain=ivozprovider-brand.sip-domain.com
    insecure=port,invite
    sendrpid=pai
    directmedia=no

.. warning:: *Retail accounts* MUST NOT challenge IvozProvider. That's
             why the *insecure* setting is used here.

.. note:: As from username is used to identify the retail account, P-Asserted-Identity must be used to specify caller number.

