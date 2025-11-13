<svg width="60" height="120" viewBox="0 0 240 260" xmlns="http://www.w3.org/2000/svg">
    <!-- Background (optional, remove if you want transparent) -->
    <defs>
        <linearGradient id="bgGrad" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#1e1e2f"/>
            <stop offset="100%" stop-color="#3b2040"/>
        </linearGradient>

        <linearGradient id="boxGrad" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#e53935"/>
            <stop offset="100%" stop-color="#b71c1c"/>
        </linearGradient>

        <linearGradient id="lidGrad" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#f44336"/>
            <stop offset="100%" stop-color="#c62828"/>
        </linearGradient>

        <linearGradient id="ribbonGrad" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#ffe082"/>
            <stop offset="100%" stop-color="#ffb300"/>
        </linearGradient>

        <radialGradient id="bowGrad" cx="30%" cy="30%" r="80%">
            <stop offset="0%" stop-color="#fff8e1"/>
            <stop offset="100%" stop-color="#ffb300"/>
        </radialGradient>
    </defs>

    <!-- Slight shadow under gift -->
    <ellipse cx="120" cy="215" rx="70" ry="14" fill="black" opacity="0.3"/>

    <!-- Gift group (so you can transform/scale easily) -->
    <g transform="translate(40,40)">
        <!-- Box -->
        <rect x="20" y="70" width="140" height="110" rx="12" fill="url(#boxGrad)"/>

        <!-- Vertical ribbon -->
        <rect x="83" y="70" width="14" height="110" fill="url(#ribbonGrad)"/>

        <!-- Horizontal ribbon -->
        <rect x="20" y="115" width="140" height="14" fill="url(#ribbonGrad)"/>

        <!-- Lid -->
        <rect x="10" y="40" width="160" height="40" rx="10" fill="url(#lidGrad)"/>
        <!-- Lid ribbon -->
        <rect x="87" y="40" width="10" height="40" fill="url(#ribbonGrad)"/>

        <!-- Bow -->
        <g transform="translate(100,40)">
            <!-- Left loop -->
            <path d="M 0 0
               C -35 -20, -55 10, -35 32
               C -20 45, -5 32, 0 20 Z"
                  fill="url(#bowGrad)" />

            <!-- Right loop -->
            <path d="M 0 0
               C 35 -20, 55 10, 35 32
               C 20 45, 5 32, 0 20 Z"
                  fill="url(#bowGrad)" />

            <!-- Knot -->
            <circle cx="0" cy="18" r="10" fill="url(#bowGrad)"/>
        </g>
    </g>
</svg>
