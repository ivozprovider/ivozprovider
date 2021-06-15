########
Firewall
########

**IvozProvider does not currently include a firewall** but...

.. danger:: We **strongly encourage any production installation to implement
              a firewall** to protect the platform from the wild Internet.

The protection method could be:

- Local firewall based on `iptables <https://www.netfilter.org/>`_

- External firewall

- Both

Exposed ports/services
----------------------

These are the **ports IvozProvider needs to expose** to work properly:

**Client side SIP signalling**:

- Port 5060 (TCP/UDP)

- Port 5061 (TCP)

- Port 10080 (TCP) for Websocket connections (WS).

- Port 10081 (TCP) for Websocket secure connections (WSS).

**Provider side SIP signalling**:

- Port 5060 (TCP/UDP)

- Port 5061 (TCP)

.. note:: Port 7060 (TCP/UDP) y 7061 TCP in case both proxies share a unique IP address.

**RTP audioflow**:

- Port range 13000-19000 UDP

**Web portal and provisioning**:

- Ports TCP 443, 1443 y 2443

.. hint:: We recommend using any **geoIP blocking** mechanism to drop connections from
          countries without clients.
