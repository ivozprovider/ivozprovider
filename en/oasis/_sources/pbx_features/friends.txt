#######
Friends
#######

**Friends** section in the **Company configuration** allows interconnection of
IvozProvider with other SIP PBX systems through a SIP *trunk*. The most typical
use case is when a company have multiple PBX systems that want to integrate in
a single flow.

.. warning:: It's important to understand the difference between **Contract peering**
             defined by the **brand operator** to connect with the public network
             and **Friends**, defined by **company administrators** to connect the
             system with other PBXs.

What does this allow?
=====================

This sections allows not just communication between users at boths ends of the
SIP *trunk*, but also:

- Users "from the other side" can call to the public network just like native
  Ivozprovider :ref:`Users <users>`.

- Public network calls can be routed to the other SIP *trunk* end.

Types of friends
================

There are 2 main types of SIP PBX that can be integrate with IvozProvider:

- **Direct connection PBX**: IvozProvider must be able to talk SIP directly with
  this kind of friends by just redirecting the traffic to the proper port of
  the public IP address of the PBX.

- **PBX behind NAT**: Not directly accesible. This kind of PBX must register at
  IvozProvider (just like all the :ref:`Terminals <terminals>` do).


What kind of calls can be routed through a *friend*?
====================================================

IvozProvider must know what calls must be routed to the different defined *friends*.
For that, **company administrator** will configure regular expressions that
describe the numbers that *can be reached* through the **friend**.

.. note:: Internal :ref:`extensions <extensions>` have priority over any expression
          defined in the *friends*.

To sum up, IvozProvider will route a call received by a :ref:`user <users>` or
a :ref:`friend <friends>` following this logic:

1. Destination matches an existing IvozProvider extension?

2. If not: Destination matches any *friend* regular expression?

3. If not: This is an external call.

Configuration
=============

The **Friend** configuration is a merge between a **User** and a **Terminal**

.. hint:: **Friends** are so similar to **Users** that both talk SIP with the
          :ref:`proxyusers`.

This are the configurable settings of *friends*:

.. glossary::

    Name
        Name of the **friend**, like in **Terminals**. This will also be used
        in SIP messanges (sent **From User**).

    Description
        Optional. Extra information for this **friend**.

    Priority
        Used to solve conflicts while routing calls through **friends**.
        If a call destination **matches** more than one friend regular expresion
        the call will be routed through the friend with **less priority value**.

    Password
        When the *friend* send requests, IvozProvider will authenticate it using
        this password. Like in terminals **using password IS A MUST**.

    Direct connection
        If you choose 'Yes' here, you'll have to fill the protocol, address and
        port where this *friend* can be contacted.

    Call ACL
        Similar to :ref:`internal users <users>`, friends can place internal
        company calls without restriction (including Extension or other Friends).
        When calling to external numbers, this ACL will be checked if set.

    Fallback Outgoing DDI
        External calls from this *friend* will be presented with this DDI, **unless
        the source presented by friend is a DDI that exists in DDIs section**.

    Country and Area code
        Used for number transformation from and to this friend.

    Allowed codecs
        Like a terminal, *friends* will talk the selected codec.

    From domain
        Request from IvozProvider to this friend will include this domain in
        the From header.


.. note:: Calls to *friends* are considered internal. That means that ACLs won't
          be checked when calling a friend, no matter if the origin of the call
          is a user or another friend.

Asterisk as a friend
====================

At the other end of a friend can be any kind of SIP entity. This section takes
as example an Asterisk PBX system using SIP channel driver that wants to connect
to IvozProvider.

register
--------

If the system can not be directly access, Asterisk will have to register in the
platform (like a terminal will do).

Configuration will be something like this:

.. code-block:: none

    register => friend-name:friend-password@ivozprovider-company.sip-domain.com

peer
----

.. code-block:: none

    [nombre-friend]
    type=peer
    host=ivozprovider-company.sip-domain.com
    context=XXXXXX
    disallow=all
    allow=alaw
    defaultuser=friend-name
    secret=friend-password
    fromdomain=ivozprovider-company.sip-domain.com
    insecure=port,invite

.. warning:: *Friends*, like terminals, MUST NOT challenge IvozProvider. That's
             why the *insecure* setting is used here.

Summary
=======

The key point is understanding that a *friend* has a direct relation with the
extension-user-terminal trio:

- Can place calls to all internal extensions and other friends.

- Can place external calls that its ACL allows

- Display their configured outgoing DDI when calling to external entities

- Never challenge IvozProvider requests (don't request authentication on received requests)

- Answers IvozProvider authentication challenges (All request from them to
  IvozProvider must be autheticated for security reasons)

- Only connects with *Users SIP Proxy*, like terminals. In fact, SIP traffic from
  friends are identical to any other user terminal traffic in format.
