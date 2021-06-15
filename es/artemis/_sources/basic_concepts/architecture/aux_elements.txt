**Aux profile** runs software that, even though is not vital for calls placing,
makes IvozProvider maintainer's life much easier.

In fact, without them, debugging problems would be much harder and the quality
of given service would be damaged.

Although IvozProvider does not include any of the tools mentioned here, we consider them crucial for dealing with
production environments.

We list here tools configured in all production IvozProvider installations maintained by
`Irontec <https://www.irontec.com>`_:

- **Homer SIP capture**: This amazing software lets us capture all the SIP traffic
  for later analysis, for obtaining statistics, call quality measuring, etc.
  Visit `SIP Capture website <http://sipcapture.org/>`_ for more information.

- **Kibana log viewer**: Showing logs collected by remaining `ELK stack components <https://www.elastic.co/elk-stack>`_.

- **Chronograf metric viewer**: Showing metrics collected by remaining `TICK stack components <https://www.influxdata.com/time-series-platform/>`_.
