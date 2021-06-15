Remote friends
==============

Remote friends connect a vPBX client with an external SIP entity.

Types of remote friends
-----------------------

There are 2 main types of SIP PBX that can be integrate with IvozProvider:

- **Direct connection PBX** (Connectivity mode: direct): IvozProvider must be able to talk SIP directly with
  this kind of friends by just redirecting the traffic to the proper port of
  the public IP address of the PBX.

- **PBX behind NAT** (Connectivity mode: register): Not directly accessible. This kind of PBX must register at
  IvozProvider (just like all the :ref:`Terminals <terminals>` do).

What do remote friends allow?
-----------------------------

This section allows not just communication between users at boths ends of the
SIP *trunk*, but also:

- Users "from the other side" can call to the public network just like native
  Ivozprovider :ref:`Users <users>`.

- Public network calls can be routed to the other SIP *trunk* end.

What kind of calls can be routed through a *remote friend*?
-----------------------------------------------------------

IvozProvider must know what calls must be routed to the different defined *remote friends*.
For that, **client administrator** will configure regular expressions that
describe the numbers that *can be reached* through the **friend**.

.. note:: Internal :ref:`extensions <extensions>` have priority over any expression
          defined in the *friends*.

.. important:: Avoid PCRE regular expressions in friend configuration: use [0-9] instead of \\d.

Configuration of remote friends
-------------------------------

The **Friend** configuration is a merge between a **User** and a **Terminal**

These are the configurable settings of *friends*:

.. glossary::

    Name
        Name of the **friend**, like in **Terminals**. This will also be used
        in SIP messages (sent **From User**).

    Description
        Optional. Extra information for this **friend**.

    Priority
        Used to solve conflicts while routing calls through **friends**.
        If a call destination **matches** more than one friend regular expression
        the call will be routed through the friend with **less priority value**.

    Password
        When the *friend* send requests, IvozProvider will authenticate it using
        this password. **Using password IS A MUST in "Register" mode**. In "Direct" mode,
        leaving it blank disables SIP authentication and enables IP source check.

    Connectivity mode
        Choose between "Direct" and "Register" for a remote friend.

    Call ACL
        Similar to :ref:`internal users <users>`, friends can place internal
        client calls without restriction (including Extension or other Friends).
        When calling to external numbers, this ACL will be checked if set.

    Fallback Outgoing DDI
        External calls from this *friend* will be presented with this DDI, **unless
        the source presented by friend is a DDI that exists in DDIs section**.

    Country and Area code
        Used for number transformation from and to this friend.

    Allowed codecs
        Like a terminal, *friends* will talk the selected codec.

    From user
        Request from IvozProvider to this friend will include this user in
        the From header.

    From domain
        Request from IvozProvider to this friend will include this domain in
        the From header.

    DDI In
        If set to 'Yes', set destination (R-URI and To) to called DDI/number when calling to this endpoint. If set 'No', username
        used in Contact header of registration will be used, as specified in SIP RFC (friend name will be used for
        endpoints with direct connectivity). Defaults to 'Yes'.

    Enable T.38 passthrough
        If set to 'yes', this SIP endpoint must be a **T.38 capable fax sender/receiver**. IvozProvider
        will act as a T.38 gateway, bridging fax-calls of a T.38 capable carrier and a T.38 capable device.

    Always apply transformations
        Both numbers listed in Extensions section and numbers matching any friend regexp will be considered as internal and
        won't traverse numeric transformation rules.  Enable this setting to force Numeric Transformation rules even on these numbers. 

    RTP Encryption
        If set to 'yes', call won't be established unless it's possible to encryption its audio. If set to 'no',
        audio won't be encrypted.

    Multi Contact
        Same SIP credentials can be configured in multiple SIP devices. In that case, all devices ring
        simultaneously when receiving a call. Setting this toggle to 'No' limits this behaviour so that
        only latest registered SIP device rings.

.. note:: Calls to *friends* are considered internal. That means that ACLs won't
          be checked when calling a friend, no matter if the origin of the call
          is a user or another friend.

.. tip:: Friend can be contacted due to calls to several extensions/DDIs. *DDI In* setting allows remote SIP endpoint to
         know which number caused each call, setting that number as destination (R-URI and To headers). This way, friend
         can handle calls differently.

Asterisk as a remote friend
---------------------------

At the other end of a friend can be any kind of SIP entity. This section takes
as example an Asterisk PBX system using SIP channel driver that wants to connect
to IvozProvider.

.. rubric:: register

If the system can not be directly access, Asterisk will have to register in the
platform (like a terminal will do).

Configuration will be something like this:

.. code-block:: none

    register => friendName:friendPassword@ivozprovider-client.sip-domain.com

.. rubric:: peer

.. code-block:: none

    [friendName]
    type=peer
    host=ivozprovider-client.sip-domain.com
    context=XXXXXX
    disallow=all
    allow=alaw
    defaultuser=friendName
    secret=friendPassword
    fromuser=friendName
    fromdomain=ivozprovider-brand.sip-domain.com
    insecure=port,invite
    sendrpid=pai
    directmedia=no

.. warning:: *Friends*, like terminals, MUST NOT challenge IvozProvider. That's
             why the *insecure* setting is used here.

.. note:: As from username is used to identify the friend, P-Asserted-Identity must be used to specify caller number.

Summary of remote friends
-------------------------

The key point is understanding that a *remote friend* has a direct relation with the
extension-user-terminal trio:

- Can place calls to all internal extensions and other friends.

- Can place external calls that its ACL allows

- Display their configured outgoing DDI when calling to external entities

- Never challenge IvozProvider requests (don't request authentication on received requests)

- Answers IvozProvider authentication challenges (All request from them to
  IvozProvider must be authenticated for security reasons)

- Only connects with *Users SIP Proxy*, like terminals. In fact, SIP traffic from
  friends are identical to any other user terminal traffic in format.
