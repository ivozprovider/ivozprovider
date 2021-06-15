*********************
What is IvozProvider?
*********************

IvozProvider is a :ref:`provider oriented <operator_oriented>`
:ref:`multilevel <multilevel>` :ref:`IP telephony <voip>` solution
:ref:`exposed to the public network <exposed>`.

.. _voip:

IP Telephony
============

IvozProvider supports telephony systems that use *Session Initialitation
Protocol*, **SIP**, described in `RFC 3261
<https://tools.ietf.org/html/rfc3261>`_ and any `related RFCs
<https://www.packetizer.com/ipmc/sip/standards.html>`_ independent of
manufacturers.

This allows total freedom to choose *softphones*, *hardphones* and the
rest of elements that interact with IvozProvider, without any kind of
binding with a manufacturer.

Right now, IvozProvider supports the following **transport protocols**
for SIP:

   - UDP
   - TCP
   - TLS
   - Websockets

This last transport protocol described in `RFC 7118
<https://tools.ietf.org/html/rfc7118>`_ supports web intregrated
softphones, using the `WebRTC <https://webrtc.org/>`_ standard allowing
browsers to establish real-time *peer-to-peer* connections.

The **supported audio codec** list is:

   - PCMA (*alaw*)
   - PCMU (*ulaw*)
   - GSM
   - SpeeX
   - G.722
   - G.726
   - G.729
   - iLBC
   - `OPUS <http://opus-codec.org/>`_

Multilevel
==========

The web portal design of IvozProvider allows **multiple actors within the
same infrastructure**:

.. ifconfig:: language == 'en'

    .. image:: ../operation_roles/img/en/operator_levels.png

.. ifconfig:: language == 'es'

    .. image:: ../operation_roles/img/es/operator_levels.png

In :ref:`operation_roles` section, the different roles are deeply
described, but to sum up:

- **God Admin**: The administrator and maintainer of the solution. Provides
  access to multiple brand operators.

- **Brand Operator**: Responsible of giving access, tarificate and bill to
  multiple company operators.

- **Company Operator**: Responsible of its own PBX configuration and to
  manage the final platform users.

- **Users**: The last link of the chain, has SIP credentials and can access
  its own portal for custom configurations.

**Each one** of this roles **has its own portal** that allows them to
fullfill their tasks. Each portal can be customized in the following
ways:

- Themes and *skins* for corporative colours.

- Company Logos.

- Customized URLs with the Brand or Company domain.

.. _operator_oriented:

Provider oriented
=================

IvozProvider is a telephony solution **designed with horizontal scaling
in mind**, what allows handling a great amount of **traffic and users**
only by increasing the machines and resources of them.

This are the main ideas that makes this product provider oriented:

- Despite the fact that all machine profiles can run in the same host,
  whatmakes it easier for the initial testing, each profile of IvozProvider
  can be splitted from the rest to make it run in its own machine.


- A **distributed installation** allows to distribute the correct amount of
  resources to each task, but also:

    - Geographic distribution of elements to warranty high availability in
      caseof CPD failure.

    - Setup of key elements near the final users, to minimize the communication
      latencies.

    - Horizontal scaling of key profiles to handle hundred of thousands
      concurrent calls.

The resource consuming elements that limit the service of VoIP solutions
use to be:

- Already established calls audio management.

- Managing configuration for each company administrator (IVRs, conference
  rooms, external call filters, etc.)

- Databases of configuration and records.

IvozProvider was designed always keeping in mind the **horizontal
scaling** of each of its elements, so it **can handle hundred of
thousands concurrent calls** and what is more important, **adapt the
platform resources to the expected service quality**:

- **Media-relay** servers handle audio frames for the already established
  calls:

    - You can use as many media-relays as you need.

    - You can join media-relay in groups, and force some companies to use a
      group if you want.

    - You can setup media-relays near the final users, to minimize network
      latencies in the calls.

- **Application servers** are in charge of processing the configurad logics:

    - They scale horizontally: new Application Serves can be installed and
      added to the pool if you feel the need.

    - Every call is handled by the least busy Appliction Server

    - By default, there is no static assigment * between Companies and
      Application Servers. This way failure of any Application Server is not
      critical: the platform will ignore the faulty Application Server while
      distributing calls.

.. _exposed:

Exposed to the public network
=============================

As showed in the installation proces, **IvozProvider is designed to serve
users directly from Internet**. Although it can be used in local
enviroments, IvozProvider is designed to use public IP addresses for its
services, removing the need of VPN or IPSec tunnels that connect the
infrastructure with the final users

Highlights:

- Only the required services will be exposed to Internet.

- The unstrusted origins access can be filtered out by integrated firewall

- Access from IP addresses or networks can be filtered to avoid any kind of
  phishing.

- There is also an anti-flood mechanism to avoid short-life Denial of
  Service attacks.

- Each company concurrent calls can be limited to a fixed amount.

- IvozProvider supports connection from terminals behind
  `NAT <https://es.wikipedia.org/wiki/Traducci%C3%B3n_de_direcciones_de_red>`_.

- IvozProvider keep track of those NAT windows and keep them alive with
  *nat-piercing* mechanisms.

.. [*] The global administrator can assign Application Servers to companies but
   this feature is more designed as a temporal debug and troubleshoot
   measure.
