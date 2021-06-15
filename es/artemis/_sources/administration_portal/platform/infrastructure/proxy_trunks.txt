############
Proxy Trunks
############

This is the SIP proxy exposed to external world and is in charge of connecting
with providers (carriers / DDI providers) brand administrators will configure for *SIP peering*.

.. note:: Only the IP addresses will be listed, as the port will be always 5060
    (5061 for SIP over TLS).

Main address
============

The value displayed in the entry **proxytrunks** will show the IP address
entered during the installation process.

.. danger:: This entry cannot be removed.

This IP address:

- Will be used for internal signalling:

  - KamTrunks <-> KamUsers

  - KamTrunks <-> Application Servers

- Will be used to reload Kamailio modules when needed (XMLRPC).


This value can be changed from the portal, but Kamailio make sure that KamTrunks is binded to given IP.


Additional addresses
====================

Apart from unremovable **proxytrunks** entry, additional addresses can be added here. These additional addresses can be
removed as long as they are not assigned to any Carrier / DDI Provider.

.. warning:: Apart from adding here, addresses must be configured in */etc/kamailio/proxytrunks/additional_addresses.cfg*
               (*additional_addresses.cfg.in* is given as an example). Make sure Kamailio can bind to given addresses,
               otherwise it won't boot.

The purpose of these additional addresses is to talk to different Providers using different addresses:

- Main operator (*God*) will assign IP addresses listed in this section to Brands (read :ref:`Brands`).

  - Each brand must have at least one address.

  - Each address can be assigned in several brands.

- Brand operator will assign these addresses to Carriers (read :ref:`Carriers`) and DDI Providers (read :ref:`DDI Providers`).

  - Each Provider (both Carriers and DDI Providers) must have one address.

- IvozProvider will use assigned addresses in SIP signalling with those Carriers / DDI Providers.

.. note:: Be aware that it only applies to SIP signalling, no changes are made in RTP media handling.