Media relay sets
----------------

Media relays are in charge of bridging RTP traffic of established calls. Like
the Application Servers, they can scale horizontally as much as required.

Media relays are organized in groups so they can be assigned to a client/provider. Each
element of the group has a **metric** that allows non-equal load balancing
within the same group (i.e. media-relay1 metric 1; media-relay2 metric 2:
the second media relay will handle two times the calls than the first one).

.. hint:: The static assignment of media relay groups is not the common practice
    but allow us to assign strategic resources to clients that need a warranted
    service. The most common usage of this **groups of media relays** is to
    place them near the geographic area of the client (usually far from the
    rest of the platform systems) in order to reduce **latencies** in their
    conversations.

In a standalone installation, only one media relay group will exist. By default this group only has a media server.

.. note:: The address displayed is the control socket, not the SDP address that
    will be included during SIP negotiation. By default this alone media-relay
    will share the same IP address that the User's SIP proxy.
