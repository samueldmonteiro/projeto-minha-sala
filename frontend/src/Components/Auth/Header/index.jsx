import PropTypes from 'prop-types';
import AppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import CssBaseline from '@mui/material/CssBaseline';
import useScrollTrigger from '@mui/material/useScrollTrigger';
import Box from '@mui/material/Box';
import Container from '@mui/material/Container';
import Slide from '@mui/material/Slide';
import { Logo } from '../../Header/styles';
import LogoImage from '../../../assets/logo.png'
import { PageContainer } from '@toolpad/core';
import { HeaderAuthContainer, LogoArea } from './styles';
import { Link } from 'react-router-dom';

function HideOnScroll(props) {
    const { children, window } = props;
    // Note that you normally won't need to set the window ref as useScrollTrigger
    // will default to window.
    // This is only being set here because the demo is in an iframe.
    const trigger = useScrollTrigger({
        target: window ? window() : undefined,
    });

    return (
        <Slide appear={false} direction="down" in={!trigger}>
            {children ?? <div />}
        </Slide>
    );
}

HideOnScroll.propTypes = {
    children: PropTypes.element,
    /**
     * Injected by the documentation to work in an iframe.
     * You won't need it on your project.
     */
    window: PropTypes.func,
};

export default function Header(props) {
    return (
        <>
            <CssBaseline />
            <HideOnScroll {...props}>
            <Link to="/entrar">
                <AppBar sx={{ backgroundColor: 'black' }}>
                    <HeaderAuthContainer>
                        <Toolbar>
                            <Typography variant="h6" component="div">
                                <LogoArea>
                                    <Logo src={LogoImage} size='45' />
                                    <span>Minha Sala</span>
                                </LogoArea>
                            </Typography>
                        </Toolbar>
                    </HeaderAuthContainer>
                </AppBar>
                </Link>
            </HideOnScroll>
            <Toolbar />
        </>
    );
}
