########
Security
########

IvozProvider is designed to be exposed to Internet, having public IPs on some profile's NICs.

This section talks about included and non-included (but recommended and shipped in all production IvozProvider
installations maintained by `Irontec <https://www.irontec.com>`_) security mechanisms:

.. toctree::
    :titlesonly:

    firewall
    antiflooding
    geoip_filter
    authorized_ip_ranges
    concurrent_call_limit
    current_day_max_usage
    antibruteforce