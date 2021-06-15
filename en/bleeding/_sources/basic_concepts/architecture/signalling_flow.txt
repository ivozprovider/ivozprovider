The first diagram shows the SIP signalling traffic involved in the
establishment, modification and termination of sessions following the SIP
`RFC 3261 <https://tools.ietf.org/html/rfc3261>`_ and any `related RFCs
<https://www.packetizer.com/ipmc/sip/standards.html>`_.

These are the **external SIP entities** involved:

- UACs: users hardphones, softphones, SIP-capable gadget.

- SIP carriers/DDI Providers: carriers used to interconnect IvozProvider with external SIP
  networks (and, probably, with PSTN).

All the SIP traffic (in any of the supported transports: TCP, UDP, TLS, WSS)
they send/receive is to/from this two **internal SIP entities** of IvozProvider:

- Users SIP Proxy (running `Kamailio <https://www.kamailio.org>`_).

- Trunks SIP Proxy (running `Kamailio <https://www.kamailio.org>`_).

In fact, users UACs only talk to *Users SIP Proxy* and 'SIP carriers' and 'DDI
 Providers' only talk to *Trunks SIP Proxy*.

Inside IvozProvider these two proxies may talk to *Application Servers* running
`Asterisk <http://www.asterisk.org/>`_ for some client types but **no external
element is allowed to talk to Application Servers directly**.
