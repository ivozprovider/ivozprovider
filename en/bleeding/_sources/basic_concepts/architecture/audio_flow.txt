Sessions initiated by SIP signalling protocol imply media streams shared by
involved entities.

This media streams use `RTP <https://tools.ietf.org/html/rfc3550>`_ to send and
receive the media itself, usually using UDP as a transport protocol.

**External entities** involved in RTP sessions can be divided in:

- Clients endpoints.

- Carriers/DDI Providers.

Both entities exchanges RTP with the same IvozProvider entity: *media-relays*.

IvozProvider implements *media-relays* using `RTPengine <https://github.com/sipwise/rtpengine>`_.

Similar to SIP, these *media-relays* exchanges RTP when is needed with
*Application Servers*, but **external entities never talk directly to them**.
